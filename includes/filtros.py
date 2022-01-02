import cv2 as cv
from cvzone.HandTrackingModule import HandDetector
import numpy as np

class Button:
    def __init__(self, pos, width, height, value):
        self.pos = pos
        self.width = width
        self.height = height
        self.value =value

    def draw(self, img):
        cv.rectangle(img, self.pos, (self.pos[0] + self.width, self.pos[1] + self.height),
                      (225, 225, 225), cv.FILLED)
        cv.rectangle(img, self.pos, (self.pos[0] + self.width, self.pos[1] + self.height),
                      (50, 50, 50), 3)
        cv.putText(img, self.value, (self.pos[0] + 30, self.pos[1] + 70), cv.FONT_HERSHEY_PLAIN,
                    2, (50, 50, 50), 2)

    def checkClick(self, x, y):
        if self.pos[0] < x < self.pos[0] + self.width and \
                self.pos[1] < y < self.pos[1] + self.height:
            cv.rectangle(img, (self.pos[0] + 3, self.pos[1] + 3),
                          (self.pos[0] + self.width - 3, self.pos[1] + self.height - 3),
                          (255, 255, 255), cv.FILLED)
            cv.putText(img, self.value, (self.pos[0] + 25, self.pos[1] + 80), cv.FONT_HERSHEY_PLAIN,
                        5, (0, 0, 0), 5)
            return True
        else:
            return False    

    




#Webcam
cap = cv.VideoCapture(0)
cap.set (3, 1280) #Ancho
cap.set(4, 720) #Alto
detector = HandDetector(detectionCon = 0.8, maxHands = 1) #Nivel de certeza de si se parece a una mano

rostro = cv.CascadeClassifier('haarcascade_frontalface_alt.xml')
lentes = cv.imread('comedia.png', -1 )

#Creando botones
buttonListValues = ['Nariz','Ojos','Boca', 'Orejas']
buttonList = []
y=1
for x in range (4):
        xpos = 100 + 800
        ypos = 100*y + 150
        y = y+1
        buttonList.append(Button((xpos,ypos), 100,100, buttonListValues[x]))

#Variables
myEquation = 'Escoje un filtro'
delayCounter = 0
opc = ''

#Transparecnia de la imagen
def transparencia(src, src2, pos=(0, 0), scale=1):
    src2 = cv.resize(src2, (0,0), fx=scale, fy=scale)
    h, w, _ = src2.shape
    rows, cols, _ = src.shape
    y, x = pos[0], pos[1]
    
    for i in range(h):
        for j in range(w):
            if x + i >= rows or y + j >= cols:
                continue
            alpha = float(src2[i][j][3] / 255.0)
            src[x + i][y + j] = alpha * src2[i][j][:3] + (1 - alpha) * src[x + i][y + j]
    return src

while True:
    #Get image de la camra web
    success, img = cap.read()
    img = cv.flip(img, 1)

    #Deteccion de la mano
    hands, img = detector.findHands(img, flipType=False)

    #Dibujar todos los botones
    cv.rectangle(img, (800, 50), (800 + 400, 70 + 100),
        (225, 225, 225), cv.FILLED)
    cv.rectangle(img, (800, 50), (800 + 400, 70 + 100),
        (50, 50, 50), 3) 
    
    for button in buttonList:
        button.draw(img)
    
    #Revisar la mano
    if hands:
        lmList  = hands[0]['lmList']
        length, _, img  = detector.findDistance(lmList[8],lmList[12],img)
        x,y = lmList[8]

        if length < 50:
            for i, button in enumerate(buttonList):
                if button.checkClick(x,y)  and  delayCounter == 0:
                    opc = buttonListValues[int(i%4)] [int (i/4)]
                    if opc == "N":
                            gris = cv.cvtColor(img, cv.COLOR_BGR2GRAY)
                            caras = rostro.detectMultiScale(img, 1.2, 5, 0, (120, 120), (350, 350)) 
                            for(x, y , w, h) in caras:
                                if h > 0 and w > 0:
                                    lencminy = int(y + 1 * h / 6) 
                                    lencmaxy = int(y + 4 * h / 6 )
                                    diflen = lencmaxy - lencminy
                                    lenraroi = img[lencminy:lencmaxy ,x: x+w ] 
                                    lentes2 = cv.resize(lentes, (w, diflen), interpolation=cv.INTER_CUBIC)
                                    transparencia(lenraroi, lentes2)
                    else:
                        pass
                    delayCounter = 1

    #Evitar valures duplicados
    if delayCounter != 0:
        delayCounter += 1
        if delayCounter > 10:
            delayCounter = 0
    #Display resultado/ecuacion
    cv.putText(img, myEquation, (810, 120), cv.FONT_HERSHEY_PLAIN, 3, (50,50,50), 3)

    #Mostrar imagen
    cv.imshow("img", img)
    if cv.waitKey(1) == ord('q'):
        break
    if cv.waitKey(1) == ord ('c'):
        myEquation = ''

    

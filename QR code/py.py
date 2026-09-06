import qrcode
import cv2

link1 = "https://www.facebook.com"
link2 = "https://www.youtube.com"

img1 = qrcode.make(link1)
img1.save("facebook.jpg")

img2 = qrcode.make(link2)
img2.save("youtube.jpg")

qr_detector = cv2.QRCodeDetector()

val1, points1, straight_qrcode1 = qr_detector.detectAndDecode(cv2.imread("facebook.jpg"))

val2, points2, straight_qrcode2 = qr_detector.detectAndDecode(cv2.imread("youtube.jpg"))

if val1:
    print(f"QR Code detected: {val1}")
else:
    print("QR Code not detected")

if val2:
    print(f"QR Code detected: {val2}")
else:
    print("QR Code not detected")

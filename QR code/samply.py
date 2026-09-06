import qrcode
from PIL import Image, ImageDraw

link_arr = []
user = str(input("Enter the link:"))
if user in link_arr:
    print("Invalid Link")
else:

    qrcode = qrcode.QRCode(version=1, box_size=10, border=5)
    qrcode.add_data(user) 
    qrcode.make(fit=True)

    img = qrcode.make_image(fill_color="black", back_color="white")
    img.show()
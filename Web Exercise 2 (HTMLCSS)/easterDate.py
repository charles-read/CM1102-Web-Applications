#!/usr/bin/python
import cgi, cgitb
form = cgi.FieldStorage()

yearValue = form.getvalue('year')
yearInt = int(yearValue)

formatValue = form.getvalue('formatDate')
formatString = str(formatValue)

a = yearInt % 19
b = yearInt // 100
c = yearInt % 100
d = b // 4
e = b % 4
g = (8 * b + 13) // 25
h = (19 * a + b - d - g + 15) % 30
j = c // 4
k = c % 4
m = (a + 11 * h) // 319
r = (2 * e + 2 * j - k - h + m + 32) % 7
n = (h - m + r + 90) // 25
p = (h - m + r + n + 19) % 32

numericaly = "%s/%s/%s" % (p, n, yearInt)

month = {1:'January', 2:'February', 3:'March', 4:'April', 5:'May', 6:'June', 7:'July', 8:'August', 9:'September', 10:'October', 11:'November', 12:'December'}

day = {1:"st", 2:"nd", 3:"rd", 4:"th", 5:"th", 6:"th", 7:"th", 8:"th", 9:"th" ,10:"th", 11:"th", 12:"th", 13:"th", 14:"th", 15:"th", 16:"th", 17:"th", 18:"th", 19:"th", 20:"th", 21:"st", 22:"nd", 23:"rd", 24:"th", 25:"th", 26:"th", 27:"th", 28:"th", 29:"th", 30:"th", 31:"st"}

print ("Content-Type: text/html; charset=utf-8")
print ("")
print ("<!DOCTYPE html>")
print ("<html>")
print ("""<link rel="stylesheet" type="text/css" href="../format.css">""")
print ("<head> <title> Your result... </title>  </head>")
print ("<body>")
if formatString == 'numericalForm':
	print("<center> Easter Sunday will fall on ")
	print(numericaly +	".")

elif formatString == 'verboselForm':
	print("<center> Easter Sunday will fall on ")
	print("%s" % (p))
	print("<sup>")
	print("%s" % (day[p]))
	print("</sup>")
	print(" of " + "%s" % (month[n]) + " " + "%s" % (yearInt)+	".")

else:
	print("<center> Easter Sunday will fall on ")
	print(numericaly)
 	print(", or rather")
	print("%s" % (p))
	print("<sup>")
	print("%s" % (day[p]))
	print("</sup>")
	print(" of " + "%s" % (month[n]) + " " + "%s" % (yearInt) +	".")
print ("</body>")
print ("</html>")

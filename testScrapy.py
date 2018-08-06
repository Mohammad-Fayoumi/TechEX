import urllib.request as urllib2

filedata = urllib2.urlopen('http://file.allitebooks.com/20180805/MySQL%20ConnectorPython%20Revealed.pdf')  
datatowrite = filedata.read()

with open('book.pdf', 'wb') as f:  
    f.write(datatowrite)

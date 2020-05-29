G90
G21
#1=30 (size of box)
#2=1.5 (tool radius)
#3=2 (size of box bars)
#4=5 (degrees of resolution)
#5=#4 (counter)
#6=[[#1/2]+#2] (radius of circle = tool radius + bos size) 
G00 X0 Y0 Z5
o140 do 
   #8 = [[SIN[#5]*#6]*SIN[45]] ( X and Y position)
   #9 = [0-[[1-COS[#5]]*#6]] (Z height)
   G01 X[#8] Y[#8] 
   G01 Z[#9]
   G18 G02 X[0-#8] Z[#9] I[0-#8] K[0-[#9+[#6]]]
   G19 G03 Y[0-#8] Z[#9] J[0-#8] K[0-[#9+[#6]]]
   G18 G03 X[#8] Z[#9] I[#8] K[0-[#9+[#6]]]
   G19 G02 Y[#8] Z[#9] J[#8] K[0-[#9+[#6]]]
   #5=[#5+#4]
o140 while [#8 LT [#1/2-#2-#3]]
G00 Z5
G00 X0 Y0
M2
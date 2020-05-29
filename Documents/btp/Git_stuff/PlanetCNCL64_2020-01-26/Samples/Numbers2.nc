%

O1000 sub
	O<num0> call
O1000 endsub

O1001 sub
	O<num1> call
O1001 endsub

O1002 sub
	O<num2> call
O1002 endsub

O1003 sub
	O<num3> call
O1003 endsub

O1004 sub
	O<num4> call
O1004 endsub

O1005 sub
	O<num5> call
O1005 endsub

O1006 sub
	O<num6> call
O1006 endsub

O1007 sub
	O<num7> call
O1007 endsub

O1008 sub
	O<num8> call
O1008 endsub

O1009 sub
	O<num9> call
O1009 endsub

G21 G90
#1 = 0
O100 while [#1 LE 9]
  G00 X[10*#1] Y0
  O[1000+#1] call
  #1 = [#1+1] 
O100 endwhile

%
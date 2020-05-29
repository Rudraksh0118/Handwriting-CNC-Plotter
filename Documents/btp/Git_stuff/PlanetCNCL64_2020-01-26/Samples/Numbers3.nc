%
G21 G90
#<num> = 0
O100 while [#<num> LE 9]
  G00 X[10*#<num>] Y0
  (print,O<num#<num,0>> call)
  O<num#<num,0>> call
  #<num> = [#<num>+1] 
O100 endwhile
%
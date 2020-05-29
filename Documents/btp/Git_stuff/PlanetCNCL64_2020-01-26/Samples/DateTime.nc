%
G17 G21 G90 G91.1

#<dt> = DateTime[]

#1 = Year[#<dt>]
#13 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#12 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#11 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#10 = [#1 MOD 10]

#1 = Month[#<dt>]
#15 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#14 = [#1 MOD 10]

#1 = Day[#<dt>]
#17 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#16 = [#1 MOD 10]

#1 = Hour[#<dt>]
#19 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#18 = [#1 MOD 10]

#1 = Minute[#<dt>]
#21 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#20 = [#1 MOD 10]

#1 = Second[#<dt>]
#23 = [#1 MOD 10]
#1 = Floor[#1 / 10]
#22 = [#1 MOD 10]

G21 G90
#1 = 0
O100 while [#1 LE 7]
  G00 X[10*#1] Y15
  #<num> = #[10+#1]
  (print,O<num#<num,0>> call)
  O<num#<num,0>> call
  #1 = [#1+1] 
O100 endwhile

#1 = 0
O100 while [#1 LE 5]
  G00 X[10*#1+10] Y0
  #<num> = #[18+#1]
  (print,O<num#<num,0>> call)
  O<num#<num,0>> call
  #1 = [#1+1] 
O100 endwhile

%
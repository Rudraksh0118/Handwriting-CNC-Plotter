%
(arrchr,3000,PlanetCNC\n)
(print,Length: #3000)
#<cnt> = 0
O<loop> while[#<cnt> LT #3000]
  (print,#<cnt,0>: #[3001+#<cnt>])
  #<cnt> = [#<cnt> + 1]
O<loop> endwhile
%
%
#<n> = 1
O<whl> while[#<n> LT 100]
  O<ex> if[#<_tool_exists|#<n>>]
    (print,Tool #<n,0> exists. Name is $<_tool_name|#<n,0>>)
  O<ex> endif
  #<n> = [#<n> + 1]
O<whl> endwhile
%
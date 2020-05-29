%
O100 repeat [60]
	#<dt> = DateTime[]
	#<Year> = Year[#<dt>]
	#<Month> = Month[#<dt>]
	#<Day> = Day[#<dt>]
	#<Hour> = Hour[#<dt>]
	#<Minute> = Minute[#<dt>]
	#<Second> = Second[#<dt>]
	#<MilliSec> = MilliSec[#<dt>]
	(print,DateTime: #<Year,0>/#<Month,0>/#<Day,0> #<Hour,0>:#<Minute,0>:#<Second,0>,#<MilliSec,0>)
	G04 P1 ;wait 1 second
O100 endrepeat
%
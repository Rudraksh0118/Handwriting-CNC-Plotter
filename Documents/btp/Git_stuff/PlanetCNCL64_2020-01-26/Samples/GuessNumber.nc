
(dlgname,Guess Number)
(dlg,Guess number between 1 and 10, typ=label, x=20, w=280, color=0xffa500)
(dlg,./GuessNumber.png, typ=image, x=0)
(dlg,Press OK to begin, typ=label, x=120, w=150, color=0xffa500)
(dlgshow)

#<_guess> = [round[rand[] * 9] + 1]
#<_guess_my> = 0
#<_guess_cnt> = 0

O<loop> repeat[10]

  #<_guess_cnt> = [#<_guess_cnt> + 1]

  (dlgname,Guess Number)
  (dlg,Guess number between 1 and 10, typ=label, x=20, w=280, color=0xffa500)
  (dlg,Number of tries: #<_guess_cnt,0>, typ=label, x=20, w=280)
  (dlg,Number, x=0, dec=0, def=0, min=1, max=10, param=_guess_my)
  (dlg,Press OK to continue, typ=label, x=120, w=170, color=0xffa500)
  (dlgshow)
   
  o<chk> if[#<_guess_my> GT #<_guess>]
	(dlgname,Guess Number)
	(dlg,Your number if too high, typ=label, x=20, w=280, color=0xffa500)
	(dlgshow)
  o<chk> elseif[#<_guess_my> LT #<_guess>]
	(dlgname,Guess Number)
	(dlg,Your number if too low, typ=label, x=20, w=280, color=0xffa500)
	(dlgshow)
  o<chk> else
	(dlgname,Guess Number)
	(dlg,Congratulation!, typ=label, x=20, w=320, color=0xffa500)
	(dlg,You guessed correct number in #<_guess_cnt,0> tries, typ=label, x=20, w=320)
	(dlgshow)
	M2
  o<chk> endif
  
O<loop> endrepeat


(dlgname,Guess Number)
(dlg,You failed to guess correct number, typ=label, x=20, w=280, color=0xffa500)
(dlgshow)

M2
	
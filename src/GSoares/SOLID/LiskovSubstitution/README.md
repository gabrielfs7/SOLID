Liskov Substitution Principle (LSP)
=====

A definição do LSP que foi criado por Barbara Liskov, em 1988 (daí o nome), afirma 
que "Classes derivadas devem poder ser substituídas por suas classes base".


“Se para cada objeto o1 do tipo S há um objeto o2 do tipo T de forma que, para todos os programas P definidos em 
termos de T, o comportamento de P é inalterado quando o1 é substituído por o2 então S é um subtipo de T”


* Atender o LSP, significa que as classes derivadas são completamente substituíveis por suas classes-base, ou seja, 
todo o código que utilizar a classe base será capaz de atender o LSP.

Joshua Aguilar and Tony Villicana
COMP440

Points to address about this project:

1. Query Error for university.sql file
Kept running into Query Error for line 367 in the university.sql file, line:
	/*!50001 SET collation_connection      = utf8mb4_general_ci */;
	Error: Unknown collation: 'utf8mb4_0900_ai_ci'

With some research we found this solution available here:
	https://github.com/drud/ddev/issues/1902

and replaced
	'utf8mb4_0900_ai_ci' with 'utf8mb4_general_ci'
which resolved the issue.

2. Change from mahdi to root in university.sql file
Also, we changed user 'mahdi' to 'root' in line 369.

3. Code for .sql injection was inspired from 
https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php
with heavy adjustments to make it work.

4. PHPMyAdmin locking us out of configuration settings after SQL injection with university.sql
We're unsure how to get around this and our google-fu hasn't found any helpful material.

Team Contributions: We met in person and worked on the code, step-by-step, together.
So our contribution was equal as created the code as we progressed.

Our presentation video is avaiable here: https://screenrec.com/share/Fv4WoMpcP2
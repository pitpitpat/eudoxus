INSERT INTO books (id, course_id, name, code, author, pages) VALUES (0, 1, 'To kartel', 'ISBN 11524359', 'Don Winslow', 848);
INSERT INTO courses (id, name, professor) VALUES (0, '', '');
INSERT INTO departments (id, name) VALUES (0, '');
INSERT INTO departmentsCourses (id, department_id, course_id) VALUES (0, 0, 0);
INSERT INTO secretaries (id, department_id, name, surname, username, password) VALUES (0, 0, '', '', '', '');
INSERT INTO students (id, department_id, name, surname, code, password) VALUES (0, 0, '', '', '', '');
INSERT INTO secretaryDeclaration (id, timestamp, secretary_id, code) VALUES (0, '', 0, '');
INSERT INTO secretaryDeclaration (id, timestamp, student_id, code) VALUES (0, '', 0, '');
INSERT INTO secretaryDeclarationsBooks (id, book_id, declaration_id) VALUES (0, 0, 0);
INSERT INTO studentDeclarationsBooks (id, book_id, declaration_id) VALUES (0, 0, 0);
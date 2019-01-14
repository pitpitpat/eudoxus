# Eudoxus

This repository contains a full-stack application aiming to redesign the webpage https://eudoxus.gr/ for obtaining student textbooks by greek university students. It was assigned as a project of the Human-Computer Interaction semester course.

The application simulates the use-cases of a student and of a university secretary, declaring books to obtain and books available for each course respectively.

To be able to run the program, you would need to have xampp installed and create a folder eudoxus/ inside the C:/xampp/htdocs folder (or your own installation folder if not default) and clone this repository inside the newly created eudoxus/ folder. You may go to phpMyAdmin to configure the database. We suggest running the migration scripts provided in backend/db folder, by firstly running the migrate_clean.sql file and then the migrate_data_only.sql file in the relevant phpMyAdmin database. If you wish to alter the default username/password for the MySQL xampp server, you may also need to change the values in backend/library/api/config/dbhandler.php file.

# Backend

The backend is essentially a REST API, enabling fast and easy consumption by any partnered application, developed using PHP.

Architecture-wise the backend/api/endpoints folder contains all the crud operation controllers for each publicly available entity, exposing endpoints based on the file paths. The database entities are stored in backend/api/model, along with their data access functions. A service layer is omitted due to the simplicity of the endpoint operations. For the authorization of our users and the distinction of the roles (student, secretary) a JWT token is used, created at login and passed on subsequent calls.

# Frontend

The layout and graphic interface of the website has been implemented in HTML, CSS, Bootstrap and MDBootstrap while the client-side processing happens in AngularJS, JavaScript and jQuery (other useful modules are included in the bower_components folder). The website is running in an angular app which loads the different pages using routing. Each route has its own url, HTML file and angular controller which are being loaded on top of the existing html in the index.html file, so there is no need for the whole page to be reloaded when the user changes pages.

Architecture-wise the frontend/html folder contains the html files associated with the routes. The frontend/js folder contains the brains of the frontend functionality with the controllers managing the functionality of each route and the services taking care of the requests to the backend. There is also a frontend/utilities folder which contains helper functions.

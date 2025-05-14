# User Login Prediction Web Application

This project consists of a frontend (built with React) and a backend (built with PHP) that work together to analyze user login data from an API, predict the next possible login time for each user, and present these predictions in a user-friendly interface.


## Frontend

### Description

The frontend is built using React and provides a user interface to display the last login time for each user and the predicted next login times calculated by different algorithms in the backend. The predictions are presented in a comparative table.

### Technologies Used

- React
- JavaScript
- CSS

### Installation

1.  Navigate to the frontend directory:
    ```bash
    git clone https://github.com/MeralTd/HumanasCase.git
    cd frontend
    ```
2.  Install the dependencies using npm:
    ```bash
    npm install
    ```

### Running the Frontend

1.  Navigate to the frontend directory:
    ```bash
    cd frontend
    ```
2.  Start the development server:
    ```bash
    npm start
    ```
    This will usually open the application in your browser at `http://localhost:3000`.

### Deployment

  Render üzerinde barındırılmaktadır (https://humanascaseweb.onrender.com/)
  
## Backend

### Description

The backend is built using PHP and is responsible for fetching user login data from the provided API, analyzing the login patterns, and predicting the next login time for each user using at least two different algorithms. It exposes an API endpoint for the frontend to retrieve this data. **For local development, XAMPP with PHP was used.**

### Technologies Used

- PHP
- XAMPP (for local development environment)

### Installation (XAMPP)

To run the backend locally, you need to have XAMPP installed on your system.

1.  Download and install XAMPP from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html).
2.  After installation, start the Apache web server and PHP.
3.  Place the `backend` directory (containing the `api` subdirectory and `predictions.php` file) inside the `htdocs` folder of your XAMPP installation (e.g., `C:\xampp\htdocs\` on Windows or `/Applications/XAMPP/htdocs/` on macOS).

### Running the Backend (XAMPP)

1.  Ensure that the Apache web server is running in your XAMPP control panel.
2.  You can access the backend API endpoint through your browser or via the frontend application using the following URL:
    ```
    http://localhost/HumanasCase/backend/public/predictions.php
    ```

### API Endpoint

The backend exposes the following API endpoint for the frontend to fetch predictions:

- **`backend/public/predictions.php`**: Returns a JSON response containing the last login time and the predicted next login times for each user, calculated by different algorithms.

### Deployment

  Render üzerinde barındırılmaktadır (https://humanascase.onrender.com/predictions.php)


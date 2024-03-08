# This repo is regarding the software engineering project ..

# Project Name Parking Management System
This repository contains the software engineering project.

## How to Run the Project Locally

Follow these steps to run the project on your local machine:

### 1. Clone the Repository

Clone this repository to your local machine using the following command:

```bash
git clone https://github.com/devAmaresh/se_project.git
```

### 2. Set Up Virtual Environment

Navigate to the project directory and set up a virtual environment.
Create a virtual environment:

```bash
python -m venv myvenv
```

Activate the virtual environment:

- On Windows:
```bash
myvenv\Scripts\activate
```

- On macOS and Linux:
```bash
source myvenv/bin/activate
```

### 3. Install Dependencies

While inside the virtual environment, install the project dependencies using `pip` and the `requirements.txt` file:

```bash
pip install -r requirements.txt
```

### 4. Run the Server

Once all dependencies are installed, you can run the server:

```bash
python manage.py runserver
```
The project should now be running locally. You can access it in your web browser at `http://localhost:8000/`.

### 5.Running Tailwind(optional)

Prerequisites
Ensure you have Node.js installed on your system.

Install npm packages:
```bash
npm i
```
Run this command in a new terminal both server running and tailwind build will run simultaneously...
```bash
npx tailwindcss -i ./core/static/css/input.css -o ./core/static/css/output.css --watch
```
If nodejs is not installed::
Copy the below link and paste it in the html files 
```bash
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
```
Disclaimer :: Its an old version of tailwind . Its better to follow the first method by installing nodejs
## Additional Notes

- Ensure that Python and pip are installed on your system before proceeding.
- If you encounter any issues or errors during the setup process, please refer to the project documentation or contact me devAmaresh for assistance.

Happy coding! 🚀

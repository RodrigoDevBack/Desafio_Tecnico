from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles
import os, shutil, time

def configure_image(app: FastAPI):
    app.mount("/images_projects", StaticFiles(directory="Back_End/images_projects"), name="/images_projects")

def generate_new_name_image(filename):
    name, extension = os.path.splitext(filename)
    alteration = int(time.time())
    return f"{name}_{alteration}{extension}"


def create_new_directory_user(user_name):
    os.makedirs(f"Back_End/images_projects/{user_name}", exist_ok=True)


def add_image(user_name, file):
    new_name_file = generate_new_name_image(file.filename)
    file_loc = os.path.join(f"Back_End/images_projects/{user_name}", new_name_file)
    with open(file_loc, "wb") as buffer:
        shutil.copyfileobj(file.file, buffer)
        return new_name_file
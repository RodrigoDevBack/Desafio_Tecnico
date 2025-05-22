from fastapi import FastAPI
from tortoise import Tortoise
from Back_End.Core import routers
from contextlib import asynccontextmanager
import os

def ConfigRouter(api: FastAPI):
    api.include_router(routers.router)


@asynccontextmanager
async def lifespan(app: FastAPI):
    await Tortoise.init(
        db_url= f"postgres://{os.getenv('DB_USER')}:{os.getenv('DB_PASSWORD')}@{os.getenv('DB_HOST')}:{os.getenv('DB_PORT')}/{os.getenv('DB_NAME')}",
        modules={"models": ["Back_End.Models.model_project", "Back_End.Models.model_user"]})
    await Tortoise.generate_schemas(safe=True)
    yield
    await Tortoise.close_connections()

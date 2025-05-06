from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise

async def configure_db(app: FastAPI):
    register_tortoise(
        app=app,
        config={
        'connections': {
        'default': 'postgres://postgres:qwerty123@localhost:5432/test'
        },
        'apps': {
        'my_app': {
        'models': ['Back_End.Models.models'],
        'default_connection': 'default',
        }
        }
        },
        generate_schemas=True,
        add_exception_handlers=True
        )
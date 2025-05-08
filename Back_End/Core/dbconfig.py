from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise
from Routes import config_routers

def configure_routers(app: FastAPI):
    app.include_router(config_routers.router)

async def configure_db(app: FastAPI):
    await register_tortoise(
        app=app,
        config={
        'connections': {
        'default': 'postgres://postgres:qwerty123@localhost:5432/test'
        },
        'apps': {
        'models': {
            'models': ['Back_End.Models.models'],
            'default_connection': 'default',
        }
        }    
        },
        generate_schemas=True,
        add_exception_handlers=True
        )
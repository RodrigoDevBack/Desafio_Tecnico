# syntax=docker/dockerfile:1

FROM python:latest

WORKDIR /app

RUN pip install --upgrade pip
COPY requirements.txt requirements.txt
RUN pip install -r requirements.txt

COPY . .

CMD ["uvicorn", "Back_End.main:app", "--host", "0.0.0.0", "--port", "8000"]

import typer
import json
from prettytable import PrettyTable

# Crear el inicializador del Typer
app = typer.Typer()


# Crear tarea y usar el comando para ser reconocido por el Typer
@app.command()
def crear_tarea(name: str, description: str):
    print(f"Task created: {name} - {description}")
    data = []
    with open("Data/Data.json", "r") as file:
        data = json.load(file)  

    data.append({
        "id": len(data),
        "name": name,
        "description": description,
        "estado": False
    })

    with open("Data/Data.json", "w") as file:
        json.dump(data, file, indent=4)

    # Listado de Tareas
    ver_tareas()

@app.command()
def eliminar_tarea(id: int):
    data = []
    with open("Data/Data.json", "r") as file:
        data = json.load(file)

    for task in data:
        if task["id"] == id:
            data.remove(task)
            break

    with open("Data/Data.json", "w") as file:
        json.dump(data, file, indent=4)

    # Listado de Tareas
    ver_tareas()
        

@app.command()
def actualizar_tarea(id: int, name: str, description: str, estado: bool):
    data = []
    with open("Data/Data.json", "r") as file:
        data = json.load(file)

    for task in data:
        if task["id"] == id:
            task["name"] = name
            task["description"] = description
            task["estado"] = estado
            break

    with open("Data/Data.json", "w") as file:
        json.dump(data, file, indent=4)

    # Listado de Tareas
    ver_tareas()

@app.command()
def ver_tareas():
    with open("Data/Data.json", "r") as file:
        data = json.load(file)
        table = PrettyTable()
        # Asignacion de los encabezados de la tabla
        table.field_names = ["ID","Name", "Description", "Estado"]
        for task in data:
            #Agregar filas a la tabla
            table.add_row([task["id"],task["name"], task["description"], task["estado"]])
        print(table)
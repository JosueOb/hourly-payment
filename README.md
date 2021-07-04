# Hourly Payment

_Es un proyecto realizado en PHP para la obtención del pago basándose en el día y tiempo trabajado._

## Descripción de la solución 📌 

_Primero se realiza el registro de los días de la semana y precios, establecidos en el ejercicio, abstrayéndolos en modelos
y sean gestionados mediante controladores. Después se procede a la lectura y obtención del contenido de un archivo de texto, 
ya que cada línea es un horario trabajado de un empleado y al tener un determinado formato se procede a segmentar
esta información para la obtención del nombre del empleado, días y tiempo trabajado, para determinar el pago basándose en los 
precios registrados anteriormente._

## Arquitectura ⚙

_La arquitectura de software utilizada: Modelo Vista Controlador MVC._

```
.
├── app
│   ├── Controllers
│   └── Models
│   └── Views
│   └── helpers.php
├── tests
│   └── Unit
├── vendor
├── composer.json
├── data.txt
├── index.php
└── phpunit.xml
```
## Enfoque 🛠️

_El programa permite el registro de los precios en función a un determinado periodo de tiempo y tipo de día, es decir,
si el día es laboral o feriado y si es de mañana, tarde o noche el precio por hora varía. Esto permite determinar el pago 
total de un empleado basándose en el horario trabajado._\
_El programa tiene como enfoque el cálculo del pago total a un empleado en función al día y rango de horas trabajadas._

## Metodología 📖

_La metodología Scrum, se realizó el desarrollo en base a iteraciones y utilizando pruebas unitarias para determinar la 
correcta funcionalidad del programa, desarrollo guiado por pruebas TDD._

## Comenzar 🚀

### Requisitos 📋

* Tener instalado [Composer](https://getcomposer.org/)
* Tener instalado [XAMPP](https://www.apachefriends.org/index.html) o cualquier contenedor o máquina virtual que tenga 
  instalado PHP en una versión actual.

### Instrucciones para ejecutar el programa 🔧
_Las siguientes instrucciones te permitirán probar la funcionalidad del proyecto. Para ello, se debe abrir una terminal
ubicada dentro del proyecto y ejecutar los siguientes comandos:_
* Instalación de dependencias del proyecto (PHPUnit):

```
composer install
```

* Ejecución de las pruebas unitarias del proyecto:

```
vendor/bin/phpunit
```
* Ejecución del proyecto:

```
php index.php
```
_Dentro del archivo index.php se puede editar los registros que se utilizan para determinar el pago._

_Al ejecutar el proyecto se presenta en consola un listado, que muestra el nombre del empleado y la cantidad a pagar 
en base al tiempo trabajado._


---
Realizado por [JosueoB](https://github.com/JosueOb) 
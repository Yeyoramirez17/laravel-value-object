<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Patrón Value Object en Laravel

En este proyecto se implementa el patrón `Value Object` (objetos de valor) en Laravel

### Descripción del Patrón Value Object


El patrón de diseño `Value Object` es un concepto utilizado en el desarrollo de software que se refiere a la representación de un objeto cuyo principal propósito es describir alguna característica o propiedad, más que identificar una entidad única. En lugar de centrarse en la identidad del objeto, se enfoca en el valor que lleva consigo.

Características clave del patrón Value Object:

1. Inmutabilidad: Los objetos de valor son inmutables, lo que significa que una vez que se crean, sus valores no pueden cambiar. Esto garantiza que su estado permanezca constante durante su ciclo de vida.

2. Igualdad basada en el contenido: La igualdad entre dos objetos de valor se determina por el contenido de sus atributos, no por su identidad. Dos objetos de valor son iguales si tienen los mismos valores en todos sus atributos relevantes.

3. No tienen identidad propia: A diferencia de las entidades, los objetos de valor no tienen una identidad única. Dos objetos de valor con los mismos valores en sus atributos se consideran equivalentes.

En `Laravel`, el concepto de Value Object se puede aplicar para representar ciertos tipos de datos inmutables y basados en el valor. Aunque Laravel no tiene un soporte directo para objetos de valor en sí, puedes crear clases específicas que actúen como objetos de valor en una aplicación, como se muestra en este proyecto.

## Requisitos

- PHP >= 8.1
- Composer
- Node.js y npm

## Instalación

1. Clona este repositorio: 

```bash
git clone https://github.com/Yeyoramirez17/laravel-value-object.git
```
2. Entra al directorio del proyecto: 
```bash
cd tu-proyecto
```
3. Copia el archivo de configuración: 
```bash 
cp .env.example .env
```
4. Configura el archivo `.env` con tus datos de base de datos y otras configuraciones.
5. Instala las dependencias de PHP: 
```bash 
composer install
```
6. Genera la clave de la aplicación: 
```bash 
php artisan key:generate
```
7. Ejecuta las migraciones: 
```bash
php artisan migrate
```
8. Instala las dependencias de Node.js: 
```bash 
npm install
```
9. Compila los assets: 
```bash
npm run dev
```

9. Levante el servidor local:
```bash
php artisan serve
```


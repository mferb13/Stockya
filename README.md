# Laravel + Livewire Starter Kit

## Introduction

Our Laravel + [Livewire](https://livewire.laravel.com) starter kit provides a robust, modern starting point for building Laravel applications with a Livewire frontend.

Livewire is a powerful way of building dynamic, reactive, frontend UIs using just PHP. It's a great fit for teams that primarily use Blade templates and are looking for a simpler alternative to JavaScript-driven SPA frameworks like React and Vue.

This Livewire starter kit utilizes Livewire 3, Laravel Volt, and Tailwind, but **does not include any authentication scaffolding**.

## Official Documentation

Documentation for all Laravel starter kits can be found on the [Laravel website](https://laravel.com/docs/starter-kits).

## Contributing

Thank you for considering contributing to our starter kit! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel + Livewire starter kit is open-sourced software licensed under the MIT license.
=======
<img width="500" height="500" alt="image" src="https://github.com/user-attachments/assets/4d125001-0568-4315-b64d-2fd1879a5804" />

# StockYa - Sistema de Inventario y Pedidos

## Descripción

StockYa es un sistema integral de inventario y pedidos diseñado para gestionar ventas a crédito, controlar inventarios, automatizar alertas de stock y pagos, y facilitar la administración de empleados y distribuidores. El sistema está especialmente optimizado para negocios que manejan productos perecederos y de alta rotación como desechables, salsas, panes, carnes, embutidos y lácteos.

## Características Principales

### 🏪 Gestión de Inventario
- **Registro y actualización** de productos en tiempo real
- **Alertas automáticas** cuando el stock sea menor a 10 unidades
- **Categorización** de productos (lácteos, embutidos, panes, etc.)
- **Actualización de precios** desde una interfaz centralizada

### 🛒 Sistema de Pedidos
- **Catálogo digital** con precios personalizados por cliente distribuidor
- **Carrito de pedidos** con validación automática de stock
- **Múltiples métodos de pago**: transferencia, presencial y fiado
- **Gestión de facturas** pendientes y sistema de abonos

### 👥 Gestión de Usuarios
- **Tres roles**: Administrador, Empleado y Cliente/Distribuidor
- **Sistema de códigos de acceso** para distribuidores
- **Registro y aprobación** de empleados

### 📊 Nómina y Empleados
- **Registro de días trabajados**
- **Cálculo automático** de salarios
- **Generación de comprobantes** de nómina en PDF
- **Gestión de contratos** temporales y fijos

### 🔔 Sistema de Alertas
- **Recordatorios de pago** automáticos
- **Bloqueo de fiado** cuando se superan límites de crédito (₡500,000)
- **Notificaciones de stock** bajo

## Roles del Sistema

### Administrador
- Gestión completa de inventario
- Registro de empleados
- Generación de nóminas
- Aprobación de registros
- Control de códigos de acceso para distribuidores

### Empleado
- Actualización de inventario
- Envío de recordatorios de pago
- Gestión de alertas de stock

### Cliente/Distribuidor
- Acceso a catálogo personalizado
- Realización de pedidos
- Gestión de métodos de pago
- Consulta de facturas pendientes

## Requerimientos Funcionales

| Código | Descripción |
|--------|-------------|
| RF-001 | Sistema de Login multirol |
| RF-002 | Generación de códigos de acceso para distribuidores |
| RF-003 | Registro de productos en inventario |
| RF-004 | Actualización automática de inventario |
| RF-005 | Alertas de stock bajo |
| RF-006 | Catálogo de precios personalizado |
| RF-007 | Carrito de pedidos |
| RF-008 | Selección de método de pago |
| RF-009 | Registro de datos para transferencia |
| RF-010 | Gestión de pagos fiados |
| RF-011 | Visualización de facturas pendientes |
| RF-012 | Marcación de facturas como pagadas |
| RF-013 | Recordatorios de pago automáticos |
| RF-014 | Registro de empleados |
| RF-015 | Registro de días trabajados |
| RF-016 | Generación de nómina en PDF |

## Tecnología y Arquitectura

- **Arquitectura**: Cliente-Servidor + Modular (3 capas principales)
- **Módulos principales**: Inventario, Pedidos, Nómina
- **Base de datos**: Tablas para productos, clientes, empleados e historiales
- **Documentación**: Diagramas UML (Casos de uso, Secuencia, Clases)

## Problemas Resueltos

1. **Gestión de Inventario Ineficiente** → Alertas automáticas y actualización en tiempo real
2. **Procesos Manuales en Pedidos** → Catálogo digital y validación automática
3. **Administración de Nóminas Propensa a Errores** → Generación automática de comprobantes

## Documentación Adicional

- [Diagramas BPMN](https://lucid.app/lucidchart/f0f7cef6-60e3-4813-a896-137d2d808ded/edit)
- Casos de uso detallados
- Diagramas de secuencia
- Diagrama de clases
- Mockups de interfaz

---

*Sistema desarrollado para optimizar la gestión de negocios de distribución y venta al por mayor.*


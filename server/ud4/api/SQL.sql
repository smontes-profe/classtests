CREATE TABLE productos (
    -- ID único para cada producto. Se genera automáticamente.
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- Nombre del producto. Es obligatorio (NOT NULL).
    nombre VARCHAR(255) NOT NULL,

    -- Precio del producto. DECIMAL es ideal para dinero para evitar errores de redondeo.
    precio DECIMAL(10, 2) NOT NULL,

    -- Cantidad en inventario. Por defecto es 0.
    stock INT DEFAULT 0,

    -- Fecha y hora de creación del registro. Se establece automáticamente.
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO productos (nombre, precio, stock) VALUES
('Monitor Curvo 27" QHD', 349.99, 45),
('Auriculares con Cancelación de Ruido', 129.50, 90),
('Silla Ergonómica de Oficina', 199.00, 30),
('Micrófono de Condensador USB', 75.25, 65),
('Disco Duro Externo SSD 1TB', 89.99, 150);
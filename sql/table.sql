CREATE TABLE designers (
    designer_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth VARCHAR(50),
    department TEXT,  -- For example: "men's wear", "casual fashion", etc.
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE purchases (
    purchase_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    item_name VARCHAR(100),
    price DECIMAL(10, 2),
    designer_id INT,
    added_by INT,  -- Designer who added the purchase
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    date_of_purchase TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (designer_id) REFERENCES designers(designer_id),
    FOREIGN KEY (added_by) REFERENCES designers(designer_id)  -- Assuming added_by references the designers table
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

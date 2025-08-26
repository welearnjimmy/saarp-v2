INSERT INTO users (username, password, role) VALUES 
('admin', 'hashed_password_admin', 'Admin'),
('field_agent', 'hashed_password_agent', 'Field Agent'),
('auditor', 'hashed_password_auditor', 'Auditor'),
('finance_user', 'hashed_password_finance', 'Finance');

INSERT INTO assets (asset_code, description, location_id, status) VALUES 
('A001', 'Laptop', 1, 'Available'),
('A002', 'Projector', 2, 'Available'),
('A003', 'Printer', 1, 'In Use');

INSERT INTO locations (location_name, description) VALUES 
('Warehouse 1', 'Main storage area for assets'),
('Office', 'Office area where assets are used');

INSERT INTO audits (audit_date, auditor_id, status) VALUES 
(NOW(), 3, 'Completed'),
(NOW(), 3, 'Pending');

INSERT INTO movements (asset_id, from_location_id, to_location_id, movement_date) VALUES 
(1, 1, 2, NOW()),
(2, 2, 1, NOW());

INSERT INTO discrepancies (audit_id, asset_id, description, status) VALUES 
(1, 1, 'Missing asset', 'Open'),
(2, 2, 'Excess asset', 'Resolved');
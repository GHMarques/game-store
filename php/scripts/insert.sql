INSERT INTO public.country(
	name)
	VALUES ('Brasil'),
	('Estados Unidos');
	
INSERT INTO public.client(
	name, email, password, birth, street, "number", state, complement, country_id)
	VALUES ('Gustavo', 'gustavo@gamestore.com', '123456', '1995-10-08', 'Rua 1', '1', 'MG', '', 1),
	('Henrique', 'henrique@gamestore.com', '123456', '1995-01-07', 'Rua 2', '2', 'SP', '', 1),
	('Marques', 'marques@gamestore.com', '123456', '2000-01-06', 'Rua 3', '3', 'CA', 'Apartamento 10', 2);

INSERT INTO public.company(
	name, country_id)
	VALUES ('Valve', 2),
	('PUBG Corporation', 2);

INSERT INTO public.game(
	name, release_date, recommended_age, price, description, company_id)
	VALUES ('Counter Strike', '2000-11-08', 18, '10.50', 'Melhor jogo.', 1),
	('PUBG', '2017-12-20', 18, '50.00', 'Segundo melhor jogo.', 2);
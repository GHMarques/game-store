INSERT INTO public.client(
	name, email, password, birth, street, "number", state, complement, country_id)
	VALUES ('Gustavo', 'teste@test.com', '123456', '2000-01-01', 'Rua', '12', 'MG', 'a', 1);

INSERT INTO public.country(
	name)
	VALUES ('Brazil');
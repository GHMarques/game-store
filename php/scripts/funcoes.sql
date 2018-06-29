--View para consultar empresa com maior valor arrecadado até o momento
CREATE OR REPLACE VIEW vw_bestCompany AS
SELECT company.name, COUNT(company.name) as quantidade, SUM(client_game.total_price) as valor
FROM client_game
INNER JOIN game ON game.id = client_game.game_id
INNER JOIN company ON company.id = game.company_id
GROUP BY company.name
ORDER BY valor DESC
LIMIT 1

--trigger para atualizar o campo que informa o total arrecadado por determinada desenvolvedora
CREATE OR REPLACE FUNCTION sp_updateMoney ()
RETURNS trigger AS
$$
DECLARE 
  retorno RECORD;
BEGIN

  SELECT SUM(total_price) as valor, company.id INTO retorno
  FROM client_game
  INNER JOIN game ON game.id = client_game.game_id
  INNER JOIN company ON company.id = game.company_id
  WHERE company.id = (

    SELECT company.id
    FROM client_game
    INNER JOIN game ON game.id = client_game.game_id
    INNER JOIN company ON company.id = game.company_id
    WHERE client_game.id = NEW.id
  )
  GROUP BY company.id;

  UPDATE company SET money = retorno.valor WHERE id = retorno.id;
  RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER tg_updateCompanyMoney
AFTER INSERT ON client_game
FOR EACH ROW
EXECUTE PROCEDURE sp_updateMoney();

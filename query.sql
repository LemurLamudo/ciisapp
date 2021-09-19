--EXAMPLE 
--q_web_select_parametro
SELECT os.idopcionsistema, os.nombre, os.ruta, ms.idmodulosistema, ms.nombre as modulosistema, os.activo, os.eliminado 
FROM opcionsistema as os 
INNER JOIN modulosistema as ms ON os.idmodulosistema = ms.idmodulosistema 
WHERE os.nombre 
LIKE @BUSCAR 
LIMIT @NUMEROREGISTROS OFFSET @PAGINA

--QUERY 01





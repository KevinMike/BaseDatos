create proc cantidad_pasajes_disponibles
@nro_vuelo as varchar(15)
as
select count(nro_asiento) as nro_pasajes from detalle_compra dc right join pasaje p on p.cod_pasaje = dc.cod_pasaje 
where nro_vuelo = @nro_vuelo and dc.cod_compra is  NULL
exec cantidad_pasajes_disponibles '001'

alter proc pasajes_disponibles
@nro_vuelo as varchar(15)
as
select * from detalle_compra dc right join pasaje p on p.cod_pasaje = dc.cod_pasaje 
where nro_vuelo = @nro_vuelo and dc.cod_compra is  NULL


create procedure pasajes_no_reservados
@nro_vuelo varchar(15)
as
select p.cod_pasaje, p.nro_asiento from detalle_compra dc right join pasaje p on p.cod_pasaje = dc.cod_pasaje
full join reserva r on r.cod_pasaje = p.cod_pasaje 
where (nro_vuelo = @nro_vuelo) and (dc.cod_compra is NULL) and (r.cod_reserva is null)


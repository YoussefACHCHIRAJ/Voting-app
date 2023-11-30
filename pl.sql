accept salaire prompt 'enter a salaire: ' 
accept fonction prompt 'enter a nom de fonction: ' 
declare
v_salaire employe.salaire%type := &salaire;
fonction employe.fonction%type := &fonction;
cursor c_emploies(
                 p_salaire employe.salaire%type;
                 p_fonction employe.fonction%type) is 
           select nom
	   from employe
       	   where (salaire >= p_salaire 
       	   and lower(fonction) = p_fonction);
       	   
v_employe c_emploies%rowtype;
begin
 open c_emploies(v_salaire, v_fonction);
 loop 
 fetch c_emploies into v_employe;
 exit when c_emploies%notfound;
 DBMS_OUTPUT.PUT_LINE('nom: ' || v_employe.nom || ' fonction: ' || v_employe.fonction);  
 end loop;
end;
/




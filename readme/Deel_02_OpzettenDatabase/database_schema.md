# Vives IoT Broker

## Database Scheme

---

### Tabel **USER**

|     | name                                    | type    |
| :-: | --------------------------------------- | :--:    |
| PK  | USER_ID(PK, NotNull, AutoIncr, Unique ) |         |
|     | firstname(NotNull)              	    | varchar |
|     | lastnamename(NotNull)              	    | varchar |
|     | password(NotNull)                       | varchar |
|     | email (NotNull, voucher, Unique )       | varchar |
|	  | vkey(Unique,NotNull)				  	|	int   |
|     | api_key( NotNull, Unique, static )      |         |
|     | status(enum)                            |         |


De Users tabel zal de informatie voor de gebruikers bijhouden

---

### Tabel **SENSOR**

|     | name                                       |  type   |
| :-: | ------------------------------------------ | :-----: |
| PK  | Sensor_id( PK, NotNull, AutoIncr, Unique ) |   int   |
|     | name( NotNull )                            | varchar |
|	  | type (NotNull)							   | varchar |
|	  | Unit (NotNull)							   | varchar |
|	  | timestamp(date_time(now))				   |	     |
| FK  | user_id (NotNull)					  	   |   int	 |


De tabel sensors bevat de gegevens van alle sensors zoals de unieke sensor_id, 

---

### Tabel **DATA**

|     | name                                           | type |
| :-: | ---------------------------------------------- | :--: |
| PK  | Data_id(PK, NotNull, AutoIncr, Unique ) 	   | int  |
|     | value(NotNull)                             	   | int  |
|     | timestamp(date_time(now))                      | int  |
| FK  | sensor_id( NotNull)               			   | int  |


De tabel Data 



---

[Deel 2 – Opzetten database](./Readme.md)

[Home](/README.md)

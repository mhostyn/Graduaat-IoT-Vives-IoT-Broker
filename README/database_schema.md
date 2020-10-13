# Vives IoT Broker

## Database Schema

---

### Tabel **USER**

|      | name                                    |  type   |
| :-:  | --------------------------------------- |  :--:   |
|  PK  | USER_ID(NotNull, AutoIncr, Unique )     |         |
|      | firstname(NotNull)              	     | varchar |
|      | lastnamename(NotNull)              	 | varchar |
|      | password(NotNull)                       | varchar |
|      | email (NotNull, voucher, Unique )       | varchar |
|	   | vkey(Unique,NotNull)				  	 |	int    |
|      | api_key( NotNull, Unique, static )      |         |
|      | status()                                |  enum   |


De Users tabel zal de informatie voor de gebruikers bijhouden

---

### Tabel **SENSOR**

|     | name                                       |      type        |
| :-: | ------------------------------------------ |     :-----:      |
| PK  | SENSOR_ID(NotNull, AutoIncr, Unique )      |       int        |
|     | name( NotNull )                            |     varchar      |
|	  | type (NotNull)							   |     varchar      |
|	  | unit (NotNull)							   |     varchar      |
|	  | timestamp()				                   |  date_time(now)  |
| FK  | user_id (NotNull)					  	   |       int	      |


De tabel sensors bevat de gegevens van alle sensors zoals de unieke sensor_id, 

---

### Tabel **DATA**

|     | name                                           |      type       |
| :-: | ---------------------------------------------- |      :--:       |
| PK  | DATA_ID(PK, NotNull, AutoIncr, Unique ) 	   |      int        |
|     | value(NotNull)                             	   |      int        |
|     | timestamp()                                    |  date_time(now) |
| FK  | sensor_id(NotNull)               			   |      int        |


De tabel Data 



---

[Readme](/README.md)

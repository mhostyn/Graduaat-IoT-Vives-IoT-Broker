# Vives IoT Broker

## Database Scheme

### Tabel **Sensors**

|     | name                                       |  type   |
| :-: | ------------------------------------------ | :-----: |
| PK  | sensor_id( PK, NotNull, AutoIncr, Unique ) |   int   |
| FK  | sensor_owner( FK, NotNull )                |   int   |
|     | name( NotNull )                            | varchar |
|     | discription( Null )                        |  text   |

De tabel sensors bevat de gegevens van alle sensors zoals de unieke sensor_id, de eigenaar(sensor_owner) die de sensor heeft toegevoegd, een sensornaam (Buitensensor Vives) en een eveb
ntuele omschrijving

---

### Tabel **Measurements**

|     | name                                           | type |
| :-: | ---------------------------------------------- | :--: |
| PK  | measurement_id(PK, NotNull, AutoIncr, Unique ) | int  |
| FK  | sensor_id(FK, NotNull)                         |
|     | value(NotNull)                                 |
|     | type(FK(Types.type_id) NotNull)                |

De tabel Measurements zal de sensordata bijhouden alsook het type sensor zo kan één sensor meerdere types bijhouden, om bvb batterijspanning bij te houden of het gebruik van multi-sensors toe laten

---

### Tabel **Users**

|     | name                                   | type |
| :-: | --------------------------------------- | :--: |
| PK  | user_id(PK, NotNull, AutoIncr, Unique ) |      |
|     | username(NotNull, Unique )              |      |
|     | password(NotNull)                       |      |
|     | email( Unique )                         |      |
|     | vertification_key( Unique )             |      |
|     | vertified( )                            |      |
|     | email(NotNull, Unique )                 |      |
|     | create_date(Timestamp)                  |      |

De Users tabel zal de informatie voor de gebruikers bijhouden

---

### Tabel **Types**

|     | name                                    | type |
| :-: | --------------------------------------- | :--: |
|     | type_id(PK, NotNull, AutoIncr, Unique ) |      |
|     | symbol                                  |      |
|     | type                                    |      |

De tabel Types zal gegevens han het soort meting bijhouden met het symbool (psi) en het type (druk)

---

[Deel 2 – Opzetten database](./Readme.md)

[Home](/README.md)

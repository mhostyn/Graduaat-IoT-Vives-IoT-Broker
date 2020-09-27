# Vives IoT Broker

## Database Scheme

### Tabel Sensors

'
| Sensors |
| ------------- |
| sensor_id(PK, NotNull, AutoIncr, Unique ) |
| sensor_owner(FK, NotNull) |
| name(NotNull, ) |
| discription(Null) |
'
De tabel sensors bevat de gegevens van alle sensors zoals de unieke sensor_id, de eigenaar(sensor_owner) die de sensor heeft toegevoegd, een sensornaam (Buitensensor Vives) en een eveb
ntuele omschrijving

| Measurements |
| ------------- |
| measurement_id(PK, NotNull, AutoIncr, Unique ) |
| sensor_id(FK, NotNull) |
| value(NotNull) |
| type(FK(Types.type_id) NotNull) |

De tabel Measurements zal de sensordata bijhouden alsook het type sensor zo kan één sensor meerdere types bijhouden, om bvb batterijspanning bij te houden of het gebruik van multi-sensors toe laten

| Types |
| -------- |
| type_id(PK, NotNull, AutoIncr, Unique ) |
| symbol |
| type |

De tabel Types zal gegevens han het soort meting bijhouden met het symbool (psi) en het type (druk)

| Users |
| ------------- |
| user_id(PK, NotNull, AutoIncr, Unique ) |
| username(NotNull, Unique ) |
| password(NotNull) |
| email( Unique ) |
| vertification_key( Unique ) |
| vertified( ) |
| email(NotNull, Unique ) |
| create_date(Timestamp) |

De Users tabel zal de informatie voor de gebruikers bijhouden

[Opzetten Database](./Readme.md)
[Home](/README.md)

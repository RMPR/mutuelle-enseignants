import mysql.connector
from faker import Faker
from datetime import date, datetime, timedelta
import random

n = 50

cnx = mysql.connector.connect(user='root', password='toor',
                              host='127.0.0.1',
                              database='mutuelle')

cursor = cnx.cursor()

fake = Faker()
#********************************************************************************************************************************
# =========================      REQUETES     ===================================================================================

# ============   Table enseignant  ==============
add_enseignant = "INSERT INTO enseignant(nom, prenom, telephone, email, adresse, photo, dateinscription, pass) " \
                 "VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"

# ============   Table epargne =============
add_epargne = "INSERT INTO epargne(montant, session, enseignant_idenseignant)" \
                   "VALUES (%s, %s, %s)"

# ===========    Table fond social      =============
add_fond_social = "INSERT INTO fondsocial(montant, session, enseignant_idenseignant)" \
             "VALUES (%s, %s, %s)"

# ===========    Table emprunt     =============
add_emprunt = "INSERT INTO emprunt(montant, session, interet, datebutoir, somme, enseignant_idenseignant)" \
              "VALUES (%s, %s, %s, %s, %s, %s)"

#===========     Table remboursement ===========
add_remboursement = "INSERT INTO remboursement(session, montant, reste, enseignant_idenseignant, emprunt_idemprunt, emprunt_enseignant_idenseignant)" \
                    "VALUES (%s, %s, %s, %s, %s, %s)"



# *****************************************************************************************************************************
# ========================      ACTION       ==================================================================================

#  Enseignant
for i in range(n):

    value_enseignant = (
                    fake.name(),
                    fake.name(),
                    str(random.randint(670000000, 699999999)),
                    fake.name() + "@gmail.com",
                    fake.name(),
                    fake.name(),
                    datetime(random.choice(range(2000,2018)), random.choice(range(1,12)), random.choice(range(1,30))),
                    fake.name())

    cursor.execute(add_enseignant, value_enseignant)

cnx.commit()
print("Enseignant fait")

#  epargne
for i in range(n):

    value_epargne = (
        random.randint(100000, 8000000),
        datetime(random.choice(range(2000,2018)), random.choice(range(1,12)), random.choice(range(1,30))),
        random.randint(1,50)
    )

print("Epargne faite")
cnx.commit()

# fond social
for i in range(n):

    value_fond_social = (
                  random.randint(10000000, 90000000),
                  random.choice(['fond social', 'epargnes']),
                  random.randint(1,50)
    )
    cursor.execute(add_fond_social, value_fond_social)


print("Caisse faite")

# Emprunt
for i in range(n):

    value_emprunt = (
                 random.randint(500, 10000000),
                 datetime(random.choice(range(2000,2018)), random.choice(range(1,12)), random.choice(range(1,30))),
                 random.random(.5),
                 datetime(random.choice(range(2000,2018)), random.choice(range(1,12)), random.choice(range(1,30))),
                 random.randint(500, 10000000),
                 random.randint(1, 50)
    )
    cursor.execute(add_emprunt, value_emprunt)

print("Emprunt fait")

# Remboursement
for i in range(n):

    id = random.randint(1, 50)
    value_remboursement = (
               datetime(random.choice(range(2000,2018)), random.choice(range(1,12)), random.choice(range(1,30))),
               random.randint(500, 10000000),
               random.randint(100, 1000000),
               id,
               random.randint(1,50),
               id
    )
    cursor.execute(add_remboursement, value_remboursement)

cnx.commit()
print("Remboursement fait")
# Fermeture du canal de communication
cnx.close()

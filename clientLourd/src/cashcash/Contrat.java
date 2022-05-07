package cashcash;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Contrat {

    //stockage de la connexion à la bdd
    private Connection cnx;

    public Contrat(Connection cnx){
        this.cnx = cnx;
    }

    private String[][] executionRequete(String query, int arrayX){
        try {
            Statement st = cnx.createStatement(); //équivalent en pdo : $req = $cnx->prepare();

            if(arrayX > 0){
                ResultSet rs = st.executeQuery(query); //équivalent en pdo : $req->execute();

                //on stocke dans arrayY l'index de la dernière ligne du résultat, on se replace ensuite à la 1ère ligne.
                int arrayY = 0;
                if(rs.last()) arrayY = rs.getRow();
                rs.beforeFirst();

                //on crée un tableau à 2 dimensions ayant pour hauteur, le nombre de lignes retournées par la requête et pour largeur, le nombre d'occurences retournées (voir la requête sql)
                String[][] data = new String[arrayY][arrayX];

                //on attribue aux cases du tableau les valeurs de la requête
                int i = 0;
                while(rs.next()){
                    for(int j = 0; j < data[i].length; j++){
                        data[i][j] = rs.getString(j+1);
                    }
                    i++;
                }

                st.close(); //on ferme la connexion à la bdd
                return data; //on retourne le tableau de données
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return null;
    }

    private void executionRequete(String query){
        try {
            Statement st = cnx.createStatement(); //équivalent en pdo : $req = $cnx->prepare();

            st.executeUpdate(query);

            st.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public String[][] getContratMaintenanceTermine(){
        String query = "SELECT numContrat, dateEcheance, client.numClient, ref, raisonSociale FROM contratmaintenance, client WHERE dateEcheance > CURRENT_DATE() AND contratmaintenance.numClient = client.numClient"; //requête sql

        String[][] contratMaitenanceTermine = executionRequete(query, 5); // le 2e paramètre doit être équivalent au nombre de colonnes que vous avez mis dans la requête (entre le SELECT et le FROM)

        return contratMaitenanceTermine;
    }

    public void updateContratMaintenance(int num){
        String query = "UPDATE contratmaintenance SET dateEcheance = DATE_ADD(CURRENT_DATE(), INTERVAL 1 YEAR) WHERE numContrat ="+num; //requête sql

        executionRequete(query);
    }

    public String[][] getNumSerieByClient(int numClient){
        String query = "SELECT numSerie FROM materiel WHERE numClient = "+numClient; //requête sql

        String[][] numSerieMateriel = executionRequete(query, 1); // le 2e paramètre doit être équivalent au nombre de colonnes que vous avez mis dans la requête (entre le SELECT et le FROM)

        return numSerieMateriel;
    }

    public int getNumClientByRaisonSociale(String raisonSociale){
        String query = "SELECT numClient FROM client WHERE raisonSociale = '"+raisonSociale+"'"; //requête sql

        String[][] numClientArray = executionRequete(query, 1); // le 2e paramètre doit être équivalent au nombre de colonnes que vous avez mis dans la requête (entre le SELECT et le FROM)

        int numClient = Integer.parseInt(numClientArray[0][0]);

        return numClient;
    }
}

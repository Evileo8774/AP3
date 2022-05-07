package cashcash;

import com.itextpdf.text.DocumentException;

import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Fenetre implements ActionListener {

    //variables permettant la gestion de la taille de la fenêtre
    public	final static int HT = 1550;
    public 	final static int LG = 800;
    public	final static int X = 150;
    public 	final static int Y = 200;

    //fenêtre
    private JFrame f;

    //boutons
    private JButton btnXml;
    private JButton btnPdf;
    private JButton btnContrat;
    private JButton btnRetour;
    private JButton btnRenouvellement;
    private JButton btnGenXml;
    private JButton btnGenPdf;

    //listes déroulantes
    private JList listContratMAJ;
    private JList listClients;
    private JList listContrats;

    //connexion à la bdd
    private Connection cnx;

    //variable permettant de savoir sur quelle page on se situe, par défaut, la page d'accueil
    private String pageActuelle = "accueil";

    //variables permettant le contact avec les autres classes
    private Contrat c;
    private Client cl;

    //constructeur, permet la génération de la page d'accueil
    public Fenetre(Connection connexion){
        f = new JFrame("Cash Cash");
        accueil();
        f.setBounds(X, Y, HT, LG);
        f.setBackground(Color.darkGray);
        f.setLayout(null);
        f.setVisible(true);

        cnx = connexion;
        c = new Contrat(cnx);
        cl = new Client(cnx);
    }

    //permet la génération d'une nouvelle fenêtre
    public void initNewFrame(){
        f = new JFrame("Cash Cash "+pageActuelle);
        f.setBounds(X, Y, HT, LG);
        f.setBackground(Color.darkGray);
        f.setLayout(null);
    }

    //permet d'afficher un certain contenu dans la fenêtre en fonction de la variable pageActuelle
    public void displayFrame(){
        f.setVisible(false); //on détruit la fenêtre actuelle
        initNewFrame(); //on en génère une nouvelle
        switch(pageActuelle){
            case "accueil":
                accueil();
                break;
            case "xml":
                retour();
                xml();
                break;
            case "pdf":
                retour();
                pdf();
            case "contrat":
                retour();
                contrat();
                break;
        }
        f.setVisible(true);
    }

    //génère la page d'accueil
    public void accueil(){
        btnXml = new JButton("Génération de fichier xml");
        btnXml.setBounds(200, 100, 250, 50);
        btnXml.addActionListener(this);

        btnPdf = new JButton("Génération de courrier de relance");
        btnPdf.setBounds(650, 100, 250, 50);
        btnPdf.addActionListener(this);

        btnContrat = new JButton("Contrats de maintenance");
        btnContrat.setBounds(1100, 100, 250, 50);
        btnContrat.addActionListener(this);

        f.add(btnXml);
        f.add(btnPdf);
        f.add(btnContrat);
    }

    //création du bouton permettant de retourner à la page d'accueil
    public void retour(){
        btnRetour = new JButton("Retour");
        btnRetour.setBounds(0, 0, 100, 50);
        btnRetour.addActionListener(this);
        f.add(btnRetour);
    }

    public void xml(){
        String[][] clients = cl.getClients();

        String[] affichageSelect = new String[clients.length];

        for(int i =0; i<clients.length; i++){
            affichageSelect[i] = clients[i][1];
        }


        listClients = new JList(affichageSelect);
        listClients.setBounds(100, 100, 150, clients.length*18);
        f.add(listClients);

        btnGenXml = new JButton("Générer le fichier XML");
        btnGenXml.setBounds(300, 100, 150, 50);
        btnGenXml.addActionListener(this);
        f.add(btnGenXml);
    }

    public void pdf(){
        String[][] contratsFinis = c.getContratMaintenanceTermine();

        String[] affichageSelect = new String[contratsFinis.length];

        for(int i =0; i<contratsFinis.length; i++){
            affichageSelect[i] = contratsFinis[i][4];
        }

        listContrats = new JList(affichageSelect);
        listContrats.setBounds(100, 100, 150, contratsFinis.length*18);
        f.add(listContrats);

        btnGenPdf = new JButton("Générer le courrier");
        btnGenPdf.setBounds(300, 100, 150, 50);
        btnGenPdf.addActionListener(this);
        f.add(btnGenPdf);
    }

    public void contrat(){
        String[][] contratsFinis = c.getContratMaintenanceTermine();

        String[] affichageSelect = new String[contratsFinis.length];

        for(int i =0; i<contratsFinis.length; i++){
            affichageSelect[i] = contratsFinis[i][4];
        }

        listContratMAJ = new JList(affichageSelect);
        listContratMAJ.setBounds(100, 100, 150, contratsFinis.length*18);
        f.add(listContratMAJ);

        btnRenouvellement = new JButton("Renouveler le contrat");
        btnRenouvellement.setBounds(300, 100, 150, 50);
        btnRenouvellement.addActionListener(this);
        f.add(btnRenouvellement);

    }

    //gestion des clics sur les différents boutons
    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == btnXml){
            pageActuelle = "xml";
            displayFrame();
        } else if(e.getSource() == btnPdf){
            pageActuelle = "pdf";
            displayFrame();
        } else if(e.getSource() == btnContrat){
            pageActuelle = "contrat";
            displayFrame();
        } else if(e.getSource() == btnRetour){
            pageActuelle = "accueil";
            displayFrame();
        } else if(e.getSource() == btnRenouvellement){
            String contratChoisi = (String) listContratMAJ.getSelectedValue();
            c.updateContratMaintenance(c.getNumClientByRaisonSociale(contratChoisi));
        } else if(e.getSource() == btnGenXml){
            int contratChoisi = listClients.getSelectedIndex() + 1;
            String[][] infosClient = cl.getInformationsClient(contratChoisi);
            CreerXML xml = new CreerXML(infosClient);
        } else if(e.getSource() == btnGenPdf){
            String contratChoisi = (String) listContrats.getSelectedValue();
            String[][] numSerieMateriel = c.getNumSerieByClient(c.getNumClientByRaisonSociale(contratChoisi));
            try {
                CreerPDF pdf = new CreerPDF(numSerieMateriel[0][0]);
            } catch (DocumentException ex) {
                ex.printStackTrace();
            }
        } else { //seul moyen de corriger le bug du bouton de retour de pdf
            pageActuelle = "accueil";
            displayFrame();
        }
    }
}

package cashcash;

import java.sql.*;
import java.util.Arrays;
import java.util.Date;
import javax.swing.*;

import cashcash.Fenetre;
import cashcash.ParametresBDD;

public class Main {

    public static void main(String[] args) {

        ParametresBDD unParametre = new ParametresBDD("root", "", "ap3",
                "jdbc:mysql:///");

        Connection connexion = null;
        try {
            // chargement classe driver JDBC MYSQL
            Class.forName("org.gjt.mm.mysql.Driver");
            connexion = DriverManager.getConnection(unParametre.getDriverSGBD() + unParametre.getServeurBDD(),
                    unParametre.getNomUtilisateur(), unParametre.getMotDePasse());
            //message lorsque réussite
            //JOptionPane.showMessageDialog(null, "Connexion OK");
        } catch (ClassNotFoundException ex) {
            // exception si class forName non declenchée
            JOptionPane.showMessageDialog(null, "Classe introuvable " + ex.getMessage ());
        } catch (SQLException ex){
            // exception en cas de soucis SGBD
            JOptionPane.showMessageDialog(null, "Connexion impossible : " + ex.getMessage ());
        }

        //création de la fenêtre d'application
        Fenetre f = new Fenetre(connexion);
    }
}

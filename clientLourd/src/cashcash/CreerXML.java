package cashcash;
import java.io.File;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.OutputKeys;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import org.w3c.dom.Attr;
import org.w3c.dom.Document;
import org.w3c.dom.Element;

public class CreerXML {
	
	public CreerXML(String[][] client) {
		 
	      try {
	 
	        DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
	        DocumentBuilder docBuilder = dbFactory.newDocumentBuilder();
	 
	        // élément de racine
	        Document doc = docBuilder.newDocument();
	        Element racine = doc.createElement("repertoire");
	        doc.appendChild(racine);
	 
	        // matériel
	        Element nserie = doc.createElement("nserie");
	        racine.appendChild(nserie);
	 
	        // numéro de série
	        Attr attr = doc.createAttribute("Numero");
	        attr.setValue(client[0][0]);
	        nserie.setAttributeNode(attr);
	 
	        // date de vente
	        Element dateVente = doc.createElement("dateVente");
	        dateVente.appendChild(doc.createTextNode(client[0][1]));
	        nserie.appendChild(dateVente);
	 
	        // date d'installation
	        Element dateInstallation = doc.createElement("dateInstallation");
	        dateInstallation.appendChild(doc.createTextNode(client[0][2]));
	        nserie.appendChild(dateInstallation);
	 
	        // nom du matériel
			  //à supprimer : Le groupe de Luca - Valentin - Léo n'a pas de nom de matériel dans la table. Il faudra donc décommenter le code
	        /*Element nomMateriel = doc.createElement("nom");
	        nomMateriel.appendChild(doc.createTextNode("terminal-40"));
	        nserie.appendChild(nomMateriel);*/
	  
	        // numéro de contrat
	        Element numeroContrat = doc.createElement("numeroContrat");
	        numeroContrat.appendChild(doc.createTextNode(client[0][3]));
	        nserie.appendChild(numeroContrat);
	        
	        // date de signature du contrat
	        Element dateSignature = doc.createElement("dateSignatureContrat");
	        dateSignature.appendChild(doc.createTextNode(client[0][4]));
	        nserie.appendChild(dateSignature);
	        
	        // date d'échéance du contrat
	        Element dateEcheance = doc.createElement("dateEcheanceContrat");
	        dateEcheance.appendChild(doc.createTextNode(client[0][5]));
	        nserie.appendChild(dateEcheance);
	        
	        // référence du contrat
	        Element refContrat = doc.createElement("refContrat");
	        refContrat.appendChild(doc.createTextNode(client[0][6]));
	        nserie.appendChild(refContrat);

			  // nom de du client
			  Element raisonSociale = doc.createElement("raisonSociale");
			  raisonSociale.appendChild(doc.createTextNode(client[0][7]));
			  nserie.appendChild(raisonSociale);
	 
	        // écrire le contenu dans un fichier XML
	        TransformerFactory transformerFactory = TransformerFactory.newInstance();
	        Transformer transformer = transformerFactory.newTransformer();
	        transformer.setOutputProperty(OutputKeys.INDENT, "yes"); // aller à la ligne suivante
	        DOMSource source = new DOMSource(doc);
	        StreamResult resultat = new StreamResult(new File("test.xml"));
	 
	        transformer.transform(source, resultat);
	 
	        System.out.println("Fichier sauvegardé avec succès!");
	 
	     } catch (ParserConfigurationException pce) {
	         pce.printStackTrace();
	     } catch (TransformerException tfe) {
	         tfe.printStackTrace();
	     }
	  }
	}

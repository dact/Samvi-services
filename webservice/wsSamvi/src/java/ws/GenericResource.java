/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;

import java.beans.Statement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.GET;
import javax.ws.rs.Produces;
import javax.enterprise.context.RequestScoped;
import javax.persistence.Version;
import javax.ws.rs.QueryParam;
import org.json.simple.JSONObject; 

/**
 * REST Web Service
 *
 * @author dact
 */
@Path("wssamvi")
@RequestScoped
public class GenericResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of GenericResource
     */
    public GenericResource() {
    }

    /**
     * Retrieves representation of an instance of ws.GenericResource
     * @return an instance of java.lang.String
     */
     @GET
    @Produces("application/json")
    public JSONObject getResultado() {
        
        Connection con = null;
        PreparedStatement pst = null;
        ResultSet rs = null;

        String url = "jdbc:mysql://localhost:3306/testdb";
        String user = "testuser";
        String password = "test623";

        try {
            
            con = DriverManager.getConnection(url, user, password);
            pst = con.prepareStatement("SELECT * FROM Authors");
            rs = pst.executeQuery();
            
                
            while (rs.next()) {
                System.out.print(rs.getInt(1));
                System.out.print(": ");
                System.out.println(rs.getString(2));
            }
        
            
            con.close();

        } catch (SQLException ex) {
            System.err.println("Got an exception! "); 
            System.err.println(ex.getMessage()); 

        }
         
        int resultado=0;
       
        JSONObject obj = new JSONObject();

        obj.put("res", resultado);
        
        return obj;
        
    }

    /**
     * PUT method for updating or creating an instance of GenericResource
     * @param content representation for the resource
     * @return an HTTP response with content of the updated or created resource.
     */
    @PUT
    @Consumes("application/xml")
    public void putXml(String content) {
    }
}

package system;

import java.io.*;
import jakarta.servlet.http.*;
import jakarta.servlet.*;

public class EmployeeController extends HttpServlet {
    public void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException 
    {

        PrintWriter out = res.getWriter();
        // String x = req.getParameter("op");
        out.println("<h1>Employee</h1>");
        out.close();
    }
}
package db;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;

import com.mysql.jdbc.Statement;

public class Test {
	 
	public static void main(String[] args) throws InstantiationException, IllegalAccessException, ClassNotFoundException, SQLException  {
		// TODO Auto-generated method stub
		String url="jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr/xheni_caka" ;
		String user = "xheni.caka";
		String password = "l5taa75fu";
		java.sql.Statement stmt = null;
		Connection con = null;
		String sql = null;
		Class.forName("com.mysql.jdbc.Driver").newInstance();
		
		try {
            con = DriverManager.getConnection(url, user, password);
            System.out.println("Hello");
 
        } catch (Exception e) {
            e.printStackTrace();
        }
		stmt = con.createStatement();
		sql = "DROP TABLE if Exists apply";
		stmt.executeUpdate(sql);
		
		stmt = con.createStatement();
		sql = "DROP TABLE if Exists student";
		stmt.executeUpdate(sql);
		
		stmt = con.createStatement();
		sql = "DROP TABLE if Exists company";
		stmt.executeUpdate(sql);
		//Create company table
		
		stmt = con.createStatement();
		sql = "Create table company(cid CHAR(12), "
				+ "cname VARCHAR(20), "
				+ "quota CHAR(8), "
				+ "PRIMARY KEY (cid)) ENGINE=InnoDB;";
		stmt.executeUpdate(sql);
		
		//Create student table
		
		stmt = con.createStatement();
		sql = "Create table student(sid CHAR(12), "
				+ "sname VARCHAR(50), "
				+ "bdate DATE, "
				+ "address VARCHAR(50), "
				+ "scity VARCHAR(20), "
				+ "year CHAR(20), "
				+ "gpa FLOAT, "
				+ "nationality VARCHAR(20), "
				+ "PRIMARY KEY (sid)) ENGINE=InnoDB;";
		stmt.executeUpdate(sql);
		
		//Create apply table
		
		stmt = con.createStatement();
		sql = "Create table apply(sid CHAR(12), "
				+ "cid CHAR(8), "
				+ "FOREIGN KEY (sid) REFERENCES student(sid), "
				+ "FOREIGN KEY (cid) REFERENCES company(cid), PRIMARY KEY(sid,cid)) ENGINE=InnoDB;";
		stmt.executeUpdate(sql);
		
		//insert into students
		stmt = con.createStatement();
		sql = "INSERT INTO `student`(`sid`, `sname`, `bdate`, `address`, `scity`, `year`, `gpa`, `nationality`)"
				+ " VALUES "
				+ "('21000001','Ayse','1995-05-10','Tunali','Ankara','senior','2.75','TC'), "
				+ "('21000002','Ali','1997-09-12','Nisantasi','Istanbul','junior','3.44','TC'),"
				+ "('21000003','Veli','1998-10-25','Nisantasi','Istanbul','freshman','2.36','TC'),"
				+ "('21000004','John','1999-01-15','Windy','Chicago','freshman','2.55','US')";
		stmt.executeUpdate(sql);
		//insert into company table
		stmt = con.createStatement();
		sql = "INSERT INTO `company`(`cid`, `cname`, `quota`) VALUES "
				+ "('C101','tubitak','2'),"
				+ "('C102','aselsan','5'),"
				+ "('C103','havelsan','3'),"
				+ "('C104','microsoft','5'),"
				+ "('C105','merkez bankasi','3'),"
				+ "('C106','tai','4'),"
				+ "('C107','milsoft','2')";
		stmt.executeUpdate(sql);
		
		//insert into apply
		stmt = con.createStatement();
		sql = "INSERT INTO `apply`(`sid`, `cid`) VALUES "
				+ "('21000001','C101'), "
				+ "('21000001','C102'),"
				+ "('21000001','C103'), "
				+ "('21000002','C101'),"
				+ "('21000002','C105'), "
				+ "('21000003','C104'),"
				+ "('21000003','C105'), "
				+ "('21000004','C107')";
		stmt.executeUpdate(sql);
		
		//SELECT * FROM students
		sql = "SELECT * FROM student";
		stmt = con.createStatement();
		ResultSet rs = stmt.executeQuery(sql);
		while (rs.next()) {
            System.out.println(rs.getInt("sid") + "\t"
                    + rs.getString("sname") + "\t"
                    + rs.getDate("bdate") + "\t"
                    + rs.getString("address") + "\t"
                    + rs.getString("scity") + "\t"
                    + rs.getString("year") + "\t"
            		+ rs.getInt("gpa") +"\t"
            		+ rs.getString("nationality"));
        }
	}
		
		
}

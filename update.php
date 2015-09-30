<?php
require_once('database.php');

if(!empty($_GET['firstname']) && !empty($_GET['lastname']) && !empty($_GET['email']) && !empty($_GET['id'])){
		
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$email = $_GET['email'];
		$id = $_GET['id'];
		$pdo = Database::connect();
		$stmt = $pdo->prepare('update myguests set firstname= ?, lastname=?, email=? where id=?');
		$stmt->execute(array($firstname,$lastname,$email,$id));
		Database::disconnect();
		header("Location: index.php");
}
else{
	header("Location: index.php");
}

//***************************************************

An Array.
An instance of java.util.List
An instance of java.sql.ResultSet
An instance of javax.servlet.jsp.jstl.sql.Result
An instance of javax.faces.model.DataModel.


At this post we would be introducing a simple h:dataTable that’s connected with an instance of Array.
 As h:dataTable iterates, it makes each item in the array, list, resultSet, etc., available within the body of the tag.
 The name of the item is specified with an h:dataTable’s var attribute.
 
 The h:dataTable component can contain only h:column and it will discard all other component, 
 but the h:column is capable of rendering an unlimited number of the components. 
 The h:dataTable component provides the developer capability of adding a header and footer for the dataTable that’s being created.
 
 
 1. Managed Bean

SimpleDataTableBean

package net.javabeat.jsf;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;
@ManagedBean
@SessionScoped
public class SimpleDataTableBean {

	private List<Tutorial> tutorials = new ArrayList<Tutorial>();

	public SimpleDataTableBean() {
		this.tutorials.add(new Tutorial(1, "JSF 2"));
		this.tutorials.add(new Tutorial(2, "EclipseLink"));
		this.tutorials.add(new Tutorial(3, "HTML 5"));
		this.tutorials.add(new Tutorial(4, "Spring"));
	}

	public String register() {
		return "registrationInfo";
	}

	public List<Tutorial> getTutorials() {
		return tutorials;
	}

	public void setTutorials(List<Tutorial> tutorials) {
		this.tutorials = tutorials;
	}
}


2. Tutorial Class

Tutorial.java

package net.javabeat.jsf;

public class Tutorial {
	private int tutorialId;
	private String tutorialDescription;

	public Tutorial(int id, String desc){
		this.tutorialId = id;
		this.tutorialDescription = desc;
	}

	public int getTutorialId() {
		return tutorialId;
	}
	public void setTutorialId(int tutorialId) {
		this.tutorialId = tutorialId;
	}
	public String getTutorialDescription() {
		return tutorialDescription;
	}
	public void setTutorialDescription(String tutorialDescription) {
		this.tutorialDescription = tutorialDescription;
	}
}


3. The Views

simpleDataTable.xhtml

<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:ui="http://java.sun.com/jsf/facelets"
	xmlns:h="http://java.sun.com/jsf/html"
	xmlns:f="http://java.sun.com/jsf/core">
<h:form>
	<h1>
		<h:outputText value="JavaBeat JSF 2.2 Examples" />
	</h1>
	<h2>
		<h:outputText value="dataTable Example" />
	</h2>
	<h:outputText value="JavaBeat Site Provides the Following Tutorials:"/>
	<br/>
	<h:dataTable value="#{simpleDataTableBean.tutorials}" var="tutorial" border="1">
		<h:column>
			<f:facet name="header">
				<h:outputText value="Tutorial ID"/>
			</f:facet>
			<h:outputText value="#{tutorial.tutorialId}"/>
			<f:facet name="footer">
				<h:outputText value="Tutorial ID"/>
			</f:facet>
		</h:column>
		<h:column>
			<f:facet name="header">
				<h:outputText value="Tutorial Description"/>
			</f:facet>
			<h:outputText value="#{tutorial.tutorialDescription}"/>
			<f:facet name="footer">
				<h:outputText value="Tutorial Description"/>
			</f:facet>
		</h:column>
	</h:dataTable>
</h:form>
</html>

4. The Deployment Descriptor

<?xml version="1.0" encoding="UTF-8"?>
<web-app xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns="http://java.sun.com/xml/ns/javaee" xmlns:web="http://java.sun.com/xml/ns/javaee/web-app_2_5.xsd"
	xsi:schemaLocation="http://java.sun.com/xml/ns/javaee
	http://java.sun.com/xml/ns/javaee/web-app_2_5.xsd"
	id="WebApp_ID" version="2.5" metadata-complete="true">
	<context-param>
		<description>State saving method: 'client' or 'server' (=default). See JSF Specification 2.5.2</description>
		<param-name>javax.faces.STATE_SAVING_METHOD</param-name>
		<param-value>client</param-value>
	</context-param>
	<context-param>
		<param-name>javax.faces.application.CONFIG_FILES</param-name>
		<param-value>/WEB-INF/faces-config.xml</param-value>
	</context-param>
	<servlet>
		<servlet-name>Faces Servlet</servlet-name>
		<servlet-class>javax.faces.webapp.FacesServlet</servlet-class>
		<load-on-startup>1</load-on-startup>
	</servlet>
	<servlet-mapping>
		<servlet-name>Faces Servlet</servlet-name>
		<url-pattern>/faces/*</url-pattern>
	</servlet-mapping>
	<servlet-mapping>
		<servlet-name>Faces Servlet</servlet-name>
		<url-pattern>*.xhtml</url-pattern>
	</servlet-mapping>
	<listener>
		<listener-class>com.sun.faces.config.ConfigureListener</listener-class>
	</listener>
</web-app>



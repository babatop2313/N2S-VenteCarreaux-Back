import   { Schema } from "mongoose";

export const categorieSchema = new Schema({
    nomCategorie : {type : String,  required : true},
  
}, {timestamps : true});
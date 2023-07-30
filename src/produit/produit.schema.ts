import  mongoose, { Schema } from "mongoose";

export const produitSchema = new Schema({
    nomProduit : {type : String,  required : true},
    description : {type : String, },
    prix : {type : Number,  required : true},
    image : {type : String, },
    categorie :  { type: mongoose.Schema.Types.ObjectId, ref: "categorie"}
}, {timestamps : true});

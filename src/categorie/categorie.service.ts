import { Injectable, NotFoundException } from '@nestjs/common';
import { CreateCategorieDto } from './dto/create-categorie.dto';
import { UpdateCategorieDto } from './dto/update-categorie.dto';
import { InjectModel } from '@nestjs/mongoose';
import { categorieModelName } from './categorie.model-name';
import { Model, isValidObjectId } from 'mongoose';

@Injectable()
export class CategorieService {
  constructor(@InjectModel(categorieModelName) private model : Model<CreateCategorieDto>){}
  create(createCategorieDto: CreateCategorieDto) {
    return this.model.create(createCategorieDto);
  }

  findAll() {
    return this.model.find();
  }

  findOne(id: string) {
    if(isValidObjectId(id))
      this.model.findOne({_id: id})
      throw NotFoundException
  }

  update(id: string, updateCategorieDto: UpdateCategorieDto) {
    if(isValidObjectId(id))
    this.model.findOneAndUpdate({_id: id}, updateCategorieDto, {new: true})
    throw NotFoundException
  }

  remove(id: string) {
    if(isValidObjectId(id))
    return this.model.findOneAndDelete({_id : id});
    throw new NotFoundException();
  }
}
